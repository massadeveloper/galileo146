@extends('layouts.app')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            @can('admin')
            <div class="btn btn-success btn-lg">
              You have Admin Access
            </div>
            @else
                <h1 class="jumbotron-heading">Welcome</h1>
                <p class="lead text-muted">Apply now to become a BitBoss developer</p>
                <p>
                    <a href="{{route('apply')}}" class="btn btn-primary my-2">Apply</a>
                </p>
            @endcan
        </div> 
    </section>
    <section class="">
        <div class="container">
            <h2>The Test</h2>

            <p>We built this test.</p>

            <p>We pretended to create this little - and ugly - application to collect applications from
                programmers. Can you finish it?</p>

            <p>Don't worry, we're not really going to use it to collect applications. We are better than that.</p>
            <h2>Requirements</h2>
            <ul>
                <li>Graphics
                </li>
                <ul>
                    <li>Put the sticky footer at the bottom of the page
                    </li>
                </ul>
                <li>Features for users</li>
                <ul>
                    <li>After registration, the user must be on the page to apply.</li>
                    <li>The user's application must be stored
                    </li>
                    <li>Associate the application with the user who sent it
                    </li>
                    <li>Give the user the ability to access a page where the status is present
                        your application (accepted or rejected). At login the user is automatically taken
                        on this page.
                    </li>
                    <li>A user cannot apply multiple times</li>
                </ul>
                <li>Features for Admin users</li>
                <ul>
                    <li>Only admin users can access a section with a list of applications received
                    </li>
                    <li>Notify when there is a new application (on Slack + Email to admin users)
                    </li>
                    <li>Each candidate can be rejected or rejected. Create the logic of acceptance or rejection
                        after admin clicks the action button
                    </li>
                    <li>Notify the candidate when they are accepted or rejected
                    </li>
                </ul>
                <li>Populate the database with a seed of the applications
                </li>
            </ul>
            <h2>When you are done</h2>
            <p>Make a pull request on the repository. We will review the code you wrote.</p>
            <h2>What we will examine</h2>
            <p>We'll see if the code works and if the requirements are met, sure.</p>
            <p>But we'll also look at everything else: the quality and order of the code, the inventiveness to solve a
                problem, how much do you know about Laravel, the optimizations and the small details.</p>
            <p>Don't be afraid to use too much overengineering, to overturn everything, or, on the contrary, to use our
                trace, or being too mundane. Try - if you like
                - to
                surprise us.</p>
        </div>
    </section>
@endsection
