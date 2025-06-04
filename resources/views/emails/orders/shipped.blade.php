
@component('mail::message')
# Order Confirmation

Thank you for your order! Your invoice is attached.

**Order ID:** #{{ $order->id }}  
**Order Total:** {{ number_format($order->total, 2) }} DH  
**Payment Method:** {{ ucfirst($order->payment_method) }}

@component('mail::button', ['url' => ''])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent