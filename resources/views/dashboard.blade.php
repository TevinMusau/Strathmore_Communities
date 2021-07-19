@extends('layouts.app')

@section('content')

    <div class="container">
        <!-- Tabbed Nav -->
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a href="#activity" class="nav-link active" data-toggle="tab"> My Activity </a>
            </li>
            <li class="nav-item"> 
                <a href="#edit_info" class="nav-link" data-toggle="tab">Edit Account Information</a> 
            </li>
            <li class="nav-item"> 
                <a href="#classfinder" class="nav-link" data-toggle="tab"> Class Finder </a> 
            </li>
        </ul>

    <!-- Content to be displayed when tabs are clicked -->
    <!-- Tab 1 -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="activity">
            <p class="text-center"> MY ACTIVITY </P>
        </div>
        
        <!-- Tab 2 -->
        <div role="tabpanel" class="tab-pane" id="edit_info">
            <!-- Loops through associative array passed by DashboardController and displays user info -->
            @foreach ($users as $user)
                <div class="tab-pane fade show active justify-content-center col-md-12" role="tabpanel" style="border: 1px; margin: 1rem">
                    <div class="table-responsive justify-content-center">
                        <!-- Store user data in a table -->
                        <table class="table justify-content-center">
                            <tbody>
                            <tr>
                                <th class="text-center" scope="row">Email</th>
                                <td>{{ $user -> email }}</td>
                                <td> <button class="btn btn-primary disabled"> Change </button></td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">Admission Number</th>
                                <td>{{ $user -> adm_no }}</td>
                                <td> <button class="btn btn-primary disabled"> Change </button></td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">Username</th>
                                <td>{{ $user -> username }}</td>
                                <td> <button class="btn btn-primary"> Change </button></td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">New Password</th>
                                <td> <input type="password" name="password-change" placeholder="Enter New Password"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">Confirm New Password</th>
                                <td> <input type="password" name="password-change-confirm" placeholder="Confirm New Password"></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>    
                    </div>                  
                </div>                
            @endforeach
        </div>

        <!-- Tab 3 -->
        <div role="tabpanel" class="tab-pane justify-content-center" id="classfinder">
            <p class="text-center"> COMING TO THEATRES IN AVENGERS 2 </P>
        </div>
    </div>
</div>
@endsection