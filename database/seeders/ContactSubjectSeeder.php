<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Contact\Models\ContactSubject;

class ContactSubjectSeeder extends BaseSeeder
{
    /**
     * @return void
     */
    public function run()
    {
        $subjects = [
            'お取引について',
            'クラフトビールについて',
            '自家製ソーセージについて',
            'PBについて',
            'OEMについて',
            '弊社製品全般について',
            'その他'
        ];
        foreach($subjects as $subject) {
            $exist = ContactSubject::query()->where('name', $subject)->first();
            if ($exist) {
                continue;
            }
            $seed = new ContactSubject();
            $seed->name = $subject;
            $seed->save();
        }
    }
}
