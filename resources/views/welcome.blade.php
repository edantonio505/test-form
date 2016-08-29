@extends('layouts.app')

@section('content')
    <div style="width:700px; margin:0 auto; min-height:200px; background-color:white; border:1px solid #d3e0e9; border-radius: 3px;">
        <h1 style="text-align:center;">Fill out the form</h1>
        <div style="margin:16px;">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        
            <form action="{{ route('postSaveInfo') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="first Name">First Name</label>
                    <input type="text" name="first_name" class="form-control"/>
                </div>


                <div class="form-group">
                    <label for="Last Name">Last Name</label>
                    <input type="text" name="last_name" class="form-control"/>
                </div>


                <div class="form-group">
                    <label for="Address 1">Address 1</label>
                    <input type="text" name="address1" class="form-control"/>
                </div>


                <div class="form-group">
                    <label for="Address 2">Address 2</label>
                    <input type="text" name="address2" class="form-control"/>
                </div>


                <div class="form-group">
                    <label for="City">City</label>
                    <input type="text" name="city" class="form-control"/>
                </div>


                <div class="form-group">
                    <label for="State">State</label>
                    <input type="text" name="state" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="Zip">Zip</label>
                    <input type="text" name="zip" class="form-control"/>
                </div>                

                <div class="form-group">
                    <label for="Contact Phone">Contact Phone</label>
                    <input type="text" name="phone" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="Company Name">Company Name</label>
                    <input type="text" name="company_name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="Company Address">Company Address</label>
                    <input type="text" name="company_address" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="Company City">Company City</label>
                    <input type="text" name="company_city" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="Company Phone">Company Phone</label>
                    <input type="text" name="company phone" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" name="file">
                </div>
                <div class="g-recaptcha" data-sitekey="6LdovygTAAAAALekhWrLPkQtmqffjc02W_o9efT8"></div>
                <input type="submit" value="Submit form" class="btn btn-primary btn-block"/>

            </form>
        </div>
    </div>
@endsection