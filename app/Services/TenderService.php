<?php


namespace App\Services;


use App\Models\Tender;
use Illuminate\Database\Eloquent\Model;
use League\Csv\Reader;

class TenderService
{

    private \Illuminate\Database\Eloquent\Builder $tenderInstance;

    /**
     * TenderService constructor.
     */
    public function __construct()
    {
        $this->tenderInstance = Tender::query();
    }

    /**
     * @param $filter
     */
    private function setFilter($filter)
    {
        foreach ($filter as $key => $params) {
            switch ($key) {
                case 'name':
                    $this->tenderInstance->where('name', $params);
                    break;
                case 'date':
                    $this->tenderInstance->whereDate('date', '=', $filter);
                    break;
            }
        }
    }

    /**
     * @throws \League\Csv\Exception
     */
    public function LoadTenders()
    {
        $csv = Reader::createFromPath(storage_path(config('app.csv_name')), 'r');
        $csv->setHeaderOffset(0);
        $tenders = $csv->getRecords();
        foreach ($tenders as $record) {
            Tender::updateOrCreate(
                ['external_id' => $record['Внешний код']],
                [
                    'external_id' => $record['Внешний код'],
                    'number' => $record['Номер'],
                    'status' => $record['Статус'],
                    'name' => $record['Название'],
                    'date' => strtotime($record['Дата изм.']),
                ]
            );
        }
    }

    /**
     * @param array $filter
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList($filter = [])
    {
        if (!empty($filter)) {
            $this->setFilter($filter);
        }
        return $this->tenderInstance->get();
    }

    /**
     * @param $params
     * @return Tender
     */
    public function add($params)
    {
        $tender = new Tender();
        $tender->fill($params);
        $tender->save();
        return $tender;
    }
}
