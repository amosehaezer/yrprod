@component('mail::message')
# Hello {{ $user->name }}

Dear Revivalist, <br>
You are officially registered in '#DIVINE10K', mark your calendar and BECOME ONE FAMILY IN CHRIST, TOGETHER WE LIFT HIS NAME HIGHER on November 9th, 2019. ICE BSD, 08.30 (Open Gate), See you there!


@component('mail::button', ['url' => url('barcode/'. $user->id)])
View my QR Code
@endcomponent


We Are The Revival!
@endcomponent
