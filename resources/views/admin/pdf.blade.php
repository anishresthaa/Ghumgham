<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghumgham Booking Invoice</title>
    <style>
        body{
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color:#FF1654;
           padding: 70px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        /* .col-6{
            width: 50%;
            flex: 0 0 auto;
        } */
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .stamp{
            font-size: 20px;
            margin-bottom: 25px;
            text-align: right;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
        .title{
            color: white;
        }
        #img{
            position: absolute;
             margin-left: 1000px;

        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="title">Ghumgham<sub style="font-size: 15pt">.com</sub>
                    </h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">ghumgham@gmail.com</p>
                        <p class="text-white">Kathmandu,Nepal.</p>
                        <p class="text-white">+977-9843123456</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No.: 091</h2>
                    <p class="sub-heading">Booked Date: {{$booking->booked_date}}</p>
                    <p class="sub-heading">Email Address: {{$booking->user->email}}</p>
                </div>
                <div class="col-6 name" style="text-align: right ">
                    <p class="sub-heading">Full Name: {{$booking->user->name}} </p>
                    <p class="sub-heading">Address: {{$booking->user->address}}  </p>
                    <p class="sub-heading">Phone Number: {{$booking->user->phone}} </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Booking Details</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Package Name</th>
                        <th class="w-20">Duration</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">No of People</th>
                        <th class="w-20">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$booking->package->PackageName}}</td>
                        <td>{{$booking->package->Days}} Days, {{$booking->package->Nights}} Nights</td>
                        <td>{{$booking->package->PackagePrice}}</td>
                        <td>{{$booking->no_of_people}}</td>
                        <td>{{$booking->package->PackagePrice * $booking->no_of_people}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Sub Total</td>
                        <td>{{$booking->package->PackagePrice * $booking->no_of_people}}</td>
                    </tr>
                    {{-- <tr>
                        <td colspan="4" class="text-right">Discount</td>
                        <td> -</td>
                    </tr> --}}
                    <tr>
                        <td colspan="4" class="text-right">Grand Total</td>
                        <td>{{$booking->package->PackagePrice * $booking->no_of_people}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Total Amount Recieved</td>
                        <td>{{$booking->recieved_amount}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            {{-- <img src="{{asset('backend/img/stamp.png')}}"  width="200px" height="200px" alt="stamp" id="img"> --}}

            <h3 class="heading">Payment Status: @if ($booking->payment_status == 1)Paid
                                                     @else
                                                     Payment Pending
                                                @endif
        </h3>
            <h3 class="heading">Payment Mode: Online</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2022 - Ghumgham Official. All rights reserved.
            </p>
        </div>
    </div>

</body>
</html>
