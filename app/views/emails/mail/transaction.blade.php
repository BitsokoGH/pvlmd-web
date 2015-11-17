<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Dear, {{ $name }}!</h1>

        <div> <p>Thank you for paying your bills. Below are the details of the payment</p>
            <table border='0' width='94%'>
                 
                <tr>
                    <td>Transaction Type</td>
                    <td>{{strtoupper($bill_type)}}</td>
                </tr> 
                <tr>
                    <td>ID</td>
                    <td>{{$property_id}}</td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td>GHS {{number_format($amount_paid)}}</td>
                </tr>
                <tr>
                    <td>Date Paid</td>
                    <td>{{date('D M d, Y H:i',strtotime($created_at))}}</td>
                </tr>
                <tr>
                    <td>Mode of Payment</td>
                   
                    <td>{{$payment_mode}}</td>
                </tr>

            </table>
           
        </div>
    </body>
</html>