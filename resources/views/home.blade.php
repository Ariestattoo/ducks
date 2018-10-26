@extends('layouts.app')
@section('scripts')
    <script type="application/javascript">
      const data = @json($data)
    </script>
@endsection
@section('content')

    <v-container fluid grid-list-md text-xs-center>
        <v-layout align-center justify-center column fill-height>
            <v-flex xs12>
                <pending-feedings></pending-feedings>
                <create-feeding></create-feeding>
                <previous-feedings></previous-feedings>
            </v-flex>
        </v-layout>
    </v-container>

@endsection
