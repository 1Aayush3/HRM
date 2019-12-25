<?php
namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithEvents;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Maatwebsite\Excel\Concerns\WithChunkReading;

class UserImport implements ToModel,withHeadingRow
// ,WithChunkReading,ShouldQueue, WithEvents
{
    public function model(array $row)
    {
        dd($row);
        if (!isset($row['password'])) {
            return null;
        }
        return new User([
            'name'=> $row['name'],
            'email'=> $row['email'],
            'gender'=> $row['gender'],
            'password'=> $row['password'],
            'alt_email'=> $row['alt_email'],
            'dob'=> $row['dob'],
            'joined'=> $row['joined'],
            'left'=> $row['left'],
            'phone'=> $row['phone'],
            'review'=> $row['review'],
            'designation_id'=> $row['designation_id'],
            'pan'=> $row['pan'],
            'cit'=> $row['cit'],
            'bank'=> $row['bank'],
            'acc'=> $row['acc'],
            'branch'=> $row['branch'],
            'image'=> $row['image'],
            'cit_img'=> $row['cit_img'],
            'citizenship'=> $row['citizenship'],
            'pan_img'=> $row['pan_img'],
            'contract'=> $row['contract'],
            'appointment'=> $row['appointment']
        ]);
    }

    // public function __construct(User $importedBy)
    // {
    //     $this->importedBy = $importedBy;
    // }

    // public function registerEvents(): array
    // {
    //     return [
    //         ImportFailed::class => function(ImportFailed $event) {
    //             $this->importedBy->notify(new ImportHasFailedNotification);
    //         },
    //     ];
    // }

    // public function chunkSize(): int
    // {
    //     return 1000;
    // }
}
