<?php

namespace App\Exports;

use App\Models\Latest;
use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LatestExport implements FromCollection, WithHeadings, WithMapping
{

    public function collection()
    {
        $this->students = Student::all(); 
        $this->siswaKeterlambatan = Latest::all()->groupBy('student_id')->map->count();

        return collect($this->students);
    }

    public function headings(): array
    {
        return [
            'No',
            'NIS',
            'Nama',
            'Rombel',
            'Rayon',
            'Jumlah Keterlambatan',
        ];
    }

    public function map($student): array
    {
        return [
            $student->id,
            $student->nis,
            $student->name,
            $student->rombel->rombel,
            $student->rayon->rayon,
            $this->siswaKeterlambatan[$student->id] ?? 0,
        ];
    }
}



