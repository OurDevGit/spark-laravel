@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Team No') }}{{$team['id']}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div>
                          <form>
                            <div class="form-group">
                              <label for="usr">Team Name:</label>
                              <input type="text" class="form-control" id="name" value="{{$team['name']}}">
                            </div>
                            <div class="form-group">
                              <label for="pwd">Team Card:</label>
                              <input type="number" class="form-control" id="card" value="{{$team['card']}}">
                            </div>
                            <div class="form-group">
                              <label for="plan" id="plan" name="plan">Select list:</label>
                              <select class="form-control" id="plan">
                                <option value="0">noting</option>
                                <option value="1">Annual</option>
                                <option value="2">Montly</option>
                              </select>
                            </div>
                          </form>
                            Team Members:
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($team['members'] as $member)
                                  <tr>
                                    <td></td>
                                    <td>{{$member['name']}}</td>
                                    <td>{{$member['email']}}</td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add team members</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                @foreach($team['noteam'] as $user)
                  <tr>
                    <td><input type="checkbox" name="selUser" value="{{$user['id']}}" class="checkUser" /></td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <button type="button" class="btn btn-primary" id="add">Add selected members</button>

            <form id="addMemberForm" action="/team/addmembers" method="post">
              @csrf 
              <input type="hidden" name="userids" id="addUserIdsSubmit" />
              <input type="hidden" name="teamId" value="{{$team['id']}}" id="addUserIdsSubmit" />
            </form>
        </div>
      </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
   $("#add").click(function(){
      var val = [];
      $('.checkUser:checked').each(function(i){
        val[i] = $(this).val();
      });
      if(val.length == 0){
        alert("please select members")
      }else{
        $("#addUserIdsSubmit").val(val);
        $("#addMemberForm").submit();
      }
   })
  })
</script>