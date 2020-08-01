@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Teams List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div>
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Team Name</th>
                                <th>Admin</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($teams as $teams)
                                <tr id="{{$teams['id']}}" class="team">
                                  <td></td>
                                  <td>{{$teams['name']}}</td>
                                  <td>{{$teams['adminId']}}</td>
                                </tr>
                              @endforeach
                            </tbody>
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                          </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('.team').click(function(){
      alert(window.location.protocol + "//" + window.location.host + "/team/" + $(this).attr('id'))
      window.location.href = window.location.protocol + "//" + window.location.host + "/team/" + $(this).attr('id');
    })
  })
</script>