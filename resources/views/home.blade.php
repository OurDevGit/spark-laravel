@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Create team
                        </button>
                        <a href="/team">
                          <button type="button" class="btn btn-primary">
                            Show All Teams
                          </button>
                        </a>
                        <a href="/myteam">
                          <button type="button" class="btn btn-primary">
                            Show My Teams
                          </button>
                        </a>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/team-create" method="POST">
            @csrf 
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id" value={{$id}} />
                team name: <input type="text" name="teamName" id="teamName" required />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create New Team</button>
              </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
