<tr>
<td class="header">
@if (trim($slot) === 'Laravel')
<img src="https://cdn-icons-png.flaticon.com/512/418/418154.png" alt="{{config('app.name', 'Laravel')}}" style="width:90px">
@else
<img src="https://cdn-icons-png.flaticon.com/512/418/418154.png" alt="{{config('app.name', 'Laravel')}}" style="width:90px">
<!--{{ $slot }}-->
@endif
</td>
</tr>
