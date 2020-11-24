<?php

namespace App\Repositories;

use App\Charts\BorrowMonthChart;
use App\Repositories\RepositoryInterface\BorrowRepositoryInterface;
use App\Models\Borrow;
use App\Enums\BorrowStatus;
use Carbon\Carbon;

class BorrowRepository extends BaseRepository implements BorrowRepositoryInterface
{
    public function getModel()
    {
        return Borrow::class;
    }

    public function getAll()
    {
        return $this->model->latest()->paginate(config('app.paginate'));
    }

    public function getQuerySearch($fullname, $status)
    {
        return $this->model->query()->fullname($fullname)->status($status)
            ->paginate(config('app.paginate'));
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $borrow = $this->model->findOrFail($id);

        return $borrow->update($attributes);
    }

    public function delete($id)
    {
        $borrow = $this->model->findOrFail($id);

        return $borrow->delete();
    }

    public function getHistoryBorrow($userId)
    {
        return $this->model->with(['user', 'book'])
            ->where('user_id', $userId)->get();
    }

    public function countMonth()
    {
        return $this->model->all()->where('borr_status', BorrowStatus::borrowing)
            ->groupBy(function ($borrow) {
                return $borrow->updated_at->month;
            })
            ->map(function ($group) {
                return $group->count();
        });
    }
    public function getDataMonth(){
        $month_count_chart = $this->countMonth();
        $mLabels = [];
        $mData = [];
        foreach ($month_count_chart as $labels => $data) {
            $mLabels[] = trans('admin.chart.month') . $labels;
            $mData[] = $data;
        }
        return [
            'mLabels' => $mLabels,
            'mdata' => $mData
        ];
    }

    public function countQuarter()
    {
        $yearNow = Carbon::now()->year;
        $firstTime = '00:00:00';
        $lastTime = '23:59:59';

        $firstOfQuarter1 = $yearNow . '-1-1 ' . $firstTime;
        $lastOfQuarter1 = $yearNow . '-3-31 ' . $lastTime;

        $firstOfQuarter2 = $yearNow . '-4-1 ' . $firstTime;
        $lastOfQuarter2 = $yearNow . '-6-30 ' . $lastTime;

        $firstOfQuarter3 = $yearNow . '-7-1 ' . $firstTime;
        $lastOfQuarter3 = $yearNow . '-9-30 ' . $lastTime;

        $firstOfQuarter4 = $yearNow . '-10-1 ' . $firstTime;
        $lastOfQuarter4 = $yearNow . '-12-31 ' . $lastTime;

        $quarter1_count = $this->model->query()->countborow($firstOfQuarter1, $lastOfQuarter1)->count();

        $quarter2_count = $this->model->query()->countborow($firstOfQuarter2, $lastOfQuarter2)->count();

        $quarter3_count = $this->model->query()->countborow($firstOfQuarter3, $lastOfQuarter3)->count();

        $quarter4_count = $this->model->query()->countborow($firstOfQuarter4, $lastOfQuarter4)->count();

        return [
            $quarter1_count,
            $quarter2_count,
            $quarter3_count,
            $quarter4_count
        ];
    }

    public function getLabelsQuarter()
    {
        return [
            trans('admin.chart.quarterI'),
            trans('admin.chart.quarterII'),
            trans('admin.chart.quarterIII'),
            trans('admin.chart.quarterIV')
        ];
    }

    public function countYear()
    {
        return $this->model->all()->where('borr_status', BorrowStatus::borrowing)
            ->groupBy(function ($borrow) {
                return $borrow->updated_at->year;
            })
            ->map(function ($group) {
                return $group->count();
        });
    }

    public function getDataYear(){
        $year_count_chart = $this->countYear();
        $yLabels = [];
        $yData = [];
        foreach ($year_count_chart as $labels => $data) {
            $yLabels[] = trans('admin.chart.year') . $labels;
            $yData[] = $data;
        }
        return [
            'yLabels' => $yLabels,
            'ydata' => $yData
        ];
    }
    
}
