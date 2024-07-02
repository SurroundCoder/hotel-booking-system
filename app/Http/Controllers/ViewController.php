<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function loginView(){
        $statusMessage = session('status-message');

        request()->session()->forget('status-message');

        return view('pages.login.login-view', ['status' => $statusMessage]);
    }

    public function indexView(){
        $salesChart = [
            'labels'    => [ 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday' ],
            'data'      => [ 500, 430, 450, 500, 450, 500, 550],
            'backgroundColor' => [
                'rgba(224, 255, 235, 1)',
                'rgba(224, 255, 235, 1)',
                'rgba(224, 255, 235, 1)',
                'rgba(224, 255, 235, 1)',
                'rgba(224, 255, 235, 1)',
                'rgba(224, 255, 235, 1)',
                'rgba(224, 255, 235, 1)',
            ],
        ];

        $checkinSchedule = [
            0 => [
                '1543857',
                '303',
                'Bernadrt',
                '01 - 07 - 2024',
                '02 - 07 - 2024',
            ],
            1 => [
                '1543858',
                '305',
                'Roberto',
                '01 - 07 - 2024',
                '02 - 07 - 2024',
            ],
            2 => [
                '1543859',
                '706',
                'Casilas',
                '01 - 07 - 2024',
                '02 - 07 - 2024',
            ],
            3 => [
                '1543860',
                '506',
                'Miki',
                '01 - 07 - 2024',
                '02 - 07 - 2024',
            ],
            4 => [
                '1543861',
                '719',
                'Celistia',
                '01 - 07 - 2024',
                '04 - 07 - 2024',
            ],
            5 => [
                '1543862',
                '728',
                'Lanesra',
                '01 - 07 - 2024',
                '02 - 07 - 2024',
            ],
            6 => [
                '1543863',
                '711',
                'Intan',
                '01 - 07 - 2024',
                '03 - 07 - 2024',
            ],
            7 => [
                '1543864',
                '211',
                'Syakira',
                '01 - 07 - 2024',
                '03 - 07 - 2024',
            ],
            8 => [
                '1543865',
                '221',
                'Dammot',
                '01 - 07 - 2024',
                '02 - 07 - 2024',
            ],
            9 => [
                '1543866',
                '202',
                'Aljesh',
                '01 - 07 - 2024',
                '02 - 07 - 2024',
            ],
            10 => [
                '1543867',
                '212',
                'Abukri',
                '02 - 07 - 2024',
                '03 - 07 - 2024',
            ],
            11 => [
                '1543868',
                '222',
                'Holand',
                '02 - 07 - 2024',
                '03 - 07 - 2024',
            ],
            12 => [
                '1543869',
                '232',
                'Tommy',
                '04 - 07 - 2024',
                '05 - 07 - 2024',
            ]
        ];

        $data = [
            'newBooking'    => 10,
            'roomAvail'     => 200,
            'newCustomer'   => 300,
            'unqCustomer'   => 40,
            'chartData'     => json_encode($salesChart),
            'checkinData'   => json_encode($checkinSchedule),
        ];

        return view('pages.dasboard.dasboard-view', $data);
    }

    public function staffView(){
        return view('pages.staff.staff-view');
    }

    public function customerView(){
        return view('pages.customer.customer-view');
    }

    public function roomView(){
        return view('pages.room.room-view');
    }

    public function roomBookingView(){
        return view('pages.room-booking.room-booking-view');
    }

    public function roomCleaningView(){
        return view('pages.room-cleaning.room-cleaning-view');
    }
}