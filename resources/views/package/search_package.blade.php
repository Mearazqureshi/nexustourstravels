@extends('layouts.app')

@section('content')

<div class="serach-package-background">
    <div class="container">
        <div class="row">
            <div class="margin70">
                <div class="col-md-12">
                  @if(Session::get('success_msg'))
                    <div class="alert alert-success" role="alert">
                      <a class="alert-link" style="color:#fff;font-size:16px;">{{ Session::get('success_msg') }}</a>
                    </div>
                  @endif
                </div>
                
                <div class="col-md-12">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 search-package">
                        <div class="col-md-12">
                            <h2>Search Package</h2>
                            <form action="{{ url('package-list') }}" method="post">
                                
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="search-label">From</label>
                                    </div>

                                    <div class="col-md-10">
                                        <input type="text" class="form-control search-textbox" id="from" name="from" placeholder="From" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="search-label">To</label>
                                    </div>

                                    <div class="col-md-10">
                                        <input type="text" class="form-control search-textbox" id="to" name="to" placeholder="To" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <a href="{{ url('all-packages') }}" class="col-md-12 all-package-link">Show all packages.</a>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="col-md-12 btn btn-primary btn-search">Search Package</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection