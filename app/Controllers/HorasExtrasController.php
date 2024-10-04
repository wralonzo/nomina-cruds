<?php

namespace App\Controllers;

use App\Models\HorasExtrasModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;
use App\Models\UserModel;
use App\Models\CompanyModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use DateTime;

class HorasExtrasController extends ResourceController
{

    public function display($tipo = '')
    {
        try {
            $model = new HorasExtrasModel();
            $data = [];

            // Validación de parámetros (si es necesario)
            if (!in_array($tipo, ['entry', 'exit', ''])) {
                return $this->failValidationErrors('Invalid type provided');
            }

            // Consulta basada en el valor de $tipo
            if ($tipo != '') {
                $data = $model->where('entry_or_exit', $tipo)->findAll();
            } else {
                $data = $model->findAll();
            }

            // Verificar si hay datos
            if (empty($data)) {
                return $this->failNotFound('No records found');
            }

            // Respuesta exitosa
            $response = [
                'message' => 'Records retrieved successfully',
                'logged' => true,
                'data' => $data
            ];

            return $this->respond($response, 200); // Código HTTP 200 OK
        } catch (\Exception $e) {
            // Manejo de errores y excepciones
            return $this->failServerError('An error occurred: ' . $e->getMessage());
        }
    }

    public function create()
    {
        try {
            $modelHoras = new HorasExtrasModel();
            $json = $this->request->getJSON();
            $modelUser = new UserModel();
            $modelCompany = new CompanyModel();
            $user = $modelUser->where('id', $json->user_id)->first();

            if ($json->entry_or_exit == 'salida') {
                $buscarEntrada = $modelHoras
                    ->where('estado', 1)
                    ->where('entry_or_exit', 'entrada')
                    ->first();
                if (!$buscarEntrada) {
                    return $this->failResourceExists('Primero marque una entrada: ');
                }
                $company = $modelCompany->where('idPos', $user['pos'])->first();
                $data = [
                    "user_id" => $json->user_id,
                    "pos_id" => $company['idPos'],
                    "date" => $json->date,
                    "time" => $json->time,
                    "comment" => $json->comment,
                    "point_of_sale" => $company['name'],
                    "entry_or_exit" => $json->entry_or_exit
                ];
                $modelHoras->save($data);
                $lastId = $modelHoras->insertID();

                $buscarSalida = $modelHoras
                    ->where('id', $lastId)
                    ->first();
                $entrada = $buscarEntrada['date'] . ' ' . $buscarEntrada['time'];
                $salida  = $buscarSalida['date'] . ' ' . $buscarSalida['time'];
                $entradaDateTime = new DateTime($entrada);
                $salidaDateTime  = new DateTime($salida);
                $interval = $entradaDateTime->diff($salidaDateTime);
                $diffInHours = $interval->h + ($interval->days * 24); // Horas totales
                $diffInMinutes = $interval->i;
                $diferenciaTotal = $diffInHours . '.' . $diffInMinutes;
                $modelHoras->update($lastId, [
                    'time' => $buscarEntrada['time'],
                    'updated_at' => (new \DateTime())->format('Y-m-d H:i:s'),
                    'horas' => $diferenciaTotal,
                    'estado' => 0,
                    "horasalida" => $json->time,
                ]);
                $modelHoras->update($buscarEntrada['id'], array(
                    'updated_at' => (new \DateTime())->format('Y-m-d H:i:s'),
                    'horas' => $diferenciaTotal,
                    'estado' => 0,
                    "horasalida" => $diffInHours . ':' . $diffInMinutes
                ));
            } else {
                $company = $modelCompany->where('idPos', $user['pos'])->first();
                $data = [
                    "user_id" => $json->user_id,
                    "pos_id" => $company['idPos'],
                    "date" => $json->date,
                    "time" => $json->time,
                    "comment" => $json->comment,
                    "point_of_sale" => $company['name'],
                    "entry_or_exit" => $json->entry_or_exit,
                ];

                $modelHoras->save($data);
            }


            return $this->respondCreated(['message' => 'Datos registrados', 'statusCode' => 201]);
        } catch (Exception $e) {
            return $this->respondCreated(['message' => $e]);
        }
    }

    public function upgrade($id)
    {
        try {
            // Validar que el ID del usuario sea válido
            $model = new HorasExtrasModel();
            $record = $model->find($id);
            if (!$record) {
                return $this->failNotFound('record not found');
            }
            $json = $this->request->getJSON();
            if (!empty($json->password)) {
                $data['password'] = password_hash($json->password, PASSWORD_DEFAULT);
            }

            $model->update($id, $json);
            return $this->respondUpdated(['message' => 'record updated successfully', 'statusCode' => 200]);
        } catch (Exception $e) {
            return $this->failServerError('An error occurred: ' . $e->getMessage());
        }
    }

    public function find($id)
    {
        try {

            // Buscar el registro en el modelo
            $model = new HorasExtrasModel();
            $record = $model->find($id);

            // Verificar si el registro existe
            if (!$record) {
                return $this->failNotFound('Record not found');
            }

            // Respuesta exitosa con el registro encontrado
            $response = [
                'message' => 'Record found successfully',
                'logged' => true,
                'data' => $record
            ];

            return $this->respond($response, 200); // Código HTTP 200 OK
        } catch (Exception $e) {
            return $this->failServerError('An error occurred: ' . $e->getMessage());
        }
    }
    public function generateExcelReport()
    {
        try {
            // Instanciar el modelo para obtener los datos
            $model = new HorasExtrasModel();

            $data = $model->select('extra_hours.id,
            extra_hours.horas,
            extra_hours.point_of_sale,
            extra_hours.comment,
            extra_hours.horasalida,
            extra_hours.time,
            extra_hours.date,
            users.name as user_name,
            users.dpi,
            users.group_id,
            puntosventa.name as pos_name')
                ->join('users', 'users.id = extra_hours.user_id')
                ->join('puntosventa', 'puntosventa.idPos = extra_hours.pos_id')
                ->where('entry_or_exit', 'salida')
                ->findAll();


            // Si necesitas ver la consulta SQL para depurar:
            // echo $model->getLastQuery();

            // // Crear un nuevo documento de hoja de cálculo
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // // Escribir los encabezados en la primera fila
            $sheet->setCellValue('A1', 'Comentario');
            $sheet->setCellValue('B1', 'Hora inicio');
            $sheet->setCellValue('C1', 'Hora fin');
            $sheet->setCellValue('D1', 'fecha');
            $sheet->setCellValue('E1', 'Grupo');
            $sheet->setCellValue('F1', 'DPI');
            $sheet->setCellValue('G1', 'POS');
            $sheet->setCellValue('H1', 'Nombre');
            $sheet->setCellValue('I1', 'Horas');

            // // Agregar los datos a las celdas, empezando desde la fila 2
            $row = 2;
            foreach ($data as $record) {
                $sheet->setCellValue('A' . $row, $record['comment']);
                $sheet->setCellValue('B' . $row, $record['time']);
                $sheet->setCellValue('C' . $row, $record['horasalida']);
                $sheet->setCellValue('D' . $row, $record['date']);
                $sheet->setCellValue('E' . $row, $record['group_id']);
                $sheet->setCellValue('F' . $row, $record['dpi']);
                $sheet->setCellValue('G' . $row, $record['point_of_sale']);
                $sheet->setCellValue('H' . $row, $record['user_name']);
                $sheet->setCellValue('I' . $row, $record['horas']);
                $row++;
            }

            $writer = new Xlsx($spreadsheet);
            $fileName = 'reporte.xlsx';
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
            exit;
        } catch (Exception $e) {
            var_dump($e);
        }
    }
}