@extends('layouts.app')

@section('content')

    <applications inline-template>
        <div class="container">
            <table class="table">
                <h1 v-if="items.length == 0"> Is Empty </h1>
                <p>&nbsp;</p>
                   
                <tr v-for="(application, index) in items" :key="application.id">
                    <td>@{{ application.first_name }}</td>
                    <td>@{{ application.last_name }}</td>
                    <td v-if="application.job != 'Approve' &&  application.job != 'Refuse'">
                        <a href="javascript:;" @click="accept(application)" >{{__("Approve")}}</a>   |  
                        <a href="javascript:;" @click="refuse(application)" >{{__("Refuse")}}</a>
                    </td>
                    <td v-else-if="application.job == 'Approve'">
                        <p><b>Approved</b></p>
                    </td>
                    <td v-else-if="application.job == 'Refuse'">
                        <p><b>Refuse</b></p>
                    </td>
                  
                   
                </tr>
            </table>
            {{ $items->links() }}
           
        </div>
    </applications>


@endsection