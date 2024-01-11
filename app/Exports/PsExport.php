<?php

namespace App\Exports;

use App\Models\Latest;
use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $students;
    protected $siswaKeterlambatan;

    public function __construct($students, $siswaKeterlambatan)
    {
        $this->students = $students;
        $this->siswaKeterlambatan = $siswaKeterlambatan;
    }

    public function collection()
    {
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
