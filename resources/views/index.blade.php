<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo's</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BhuTuka+Expanded+One&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0; 
            padding: 0;
            box-sizing: border-box;
        }
        body{
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: .88rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            text-align: left;
            background-color: #fff;
        }
       .main{
            background-color: #F2F3F4;
            width: 80vw;
            height: 80vh;
            margin: 0 auto;
            border-radius: 5px;
            margin-top: 10px;
        }
        .title{
            font-size: 75%;
            padding: 30px;
            background-color: #329EA2;
            border-radius: 5px;
            text-transform: capitalize;
            color: #FFFFFF;
            font-weight: 800;
            /* font-size: 120%; */
            text-align: center;
            letter-spacing: 5px;
            text-decoration: underline;
            line-height: 30px;
        }
        .card.mb-3 {
            margin-bottom: 30px !important;
        }
        .grid {
            box-shadow: 0 0.46875rem 2.1875rem rgb(4 9 20 / 3%), 0 0.9375rem 1.40625rem rgb(4 9 20 / 3%), 0 0.25rem 0.53125rem rgb(4 9 20 / 5%), 0 0.125rem 0.1875rem rgb(4 9 20 / 3%);
            border-width: 0;
            transition: all .2s;
            background-color: #FFFFFF;
            height: 80%;
            margin: 20px;
            display: grid;
            border-radius: 10px;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            column-gap: 0.5rem;
            row-gap: 0.5rem;  
            padding: 10px;
        }
        .card-body{
            border: 5px block;
            height: 100%;
            background-color: #ffff;
            padding: 10px;
        }
        .card-title h1{
            text-transform: uppercase;
            color: rgba(13, 27, 62, 0.7);
            font-weight: bold;
            font-size: 120%;
            text-align: center;
        }
        .form{
            display: block;
            margin-top: 10px;
        }
        .form-group{
            /* margin-bottom: 1rem; */
            margin-bottom: 6px;
        }
        .form-control {
            transition: all .2s;
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        label {
            display: inline-block;
            margin-bottom: .1rem;
            font-weight: 600;
            letter-spacing: 1px;
        }
        ::placeholder {
            font-size: 90%;
        }

        .btn {
          margin-top: 12px;
        }

        /* CSS */
        .button-25 {
        background-color: #36A9AE;
        background-image: linear-gradient(#37ADB2, #329CA0);
        border: 1px solid #2A8387;
        border-radius: 4px;
        box-shadow: rgba(0, 0, 0, 0.12) 0 1px 1px;
        color: #FFFFFF;
        cursor: pointer;
        display: block;
        font-family: -apple-system,".SFNSDisplay-Regular","Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 17px;
        line-height: 100%;
        margin: 0;
        outline: 0;
        padding: 11px 15px 12px;
        text-align: center;
        transition: box-shadow .05s ease-in-out,opacity .05s ease-in-out;
        user-select: none;
        width: 100%;
        }

        .button-25:hover {
        box-shadow: rgba(255, 255, 255, 0.3) 0 0 2px inset, rgba(0, 0, 0, 0.4) 0 1px 2px;
        text-decoration: none;
        transition-duration: .15s, .15s;
        }

        .button-25:active {
        box-shadow: rgba(0, 0, 0, 0.15) 0 2px 4px inset, rgba(0, 0, 0, 0.4) 0 1px 1px;
        }

        .button-25:disabled {
        cursor: not-allowed;
        opacity: .6;
        }

        .button-25:disabled:active {
        pointer-events: none;
        }

        .button-25:disabled:hover {
        box-shadow: none;
        }
        .alert{
            width: calc(100% - 40px); 
            height: 50px; 
            background-color: #27AE62;
            border-radius: 4px;
            margin:10px 20px 0 20px;
        }
        .success-message{
            color: #FFFFFF;
            height: 100%;
            letter-spacing: 3px;
            font-size: 120%;
            font-weight: bold; 
            text-align: center;
            padding: 10px;
        }
        

    </style>
</head>
<body>
    <div class="main">

        <div class="title">
            <h1>My Daily Activities!</h1>
        </div>

        @if(session()->has('message'))
            <div class="alert">
                    <div class="success-message">
                        {{ session()->get('message') }}
                    </div>
            
            </div>
        @endif

        <div class="grid">

            <div class="card-body">
               
                <div class="card-title">
                    <h1>Add the things you want to do!</h1>
                </div>

                <div class="form">
                    <form action="" action="{{ route('todo.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleEmail" class="">Title</label>
                            <input name="title" id="exampleEmail" placeholder="Todo" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleEmail" class="">Description</label>
                            <input name="description" id="exampleEmail" placeholder="Description" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleEmail" class="">Start Date</label>
                            <input name="start_date" id="exampleEmail" placeholder="Todo" type="date" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleEmail" class="">End Date</label>
                            <input name="end_date" id="exampleEmail" placeholder="Todo" type="date" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleEmail" class="">Start Time</label>
                            <input name="start_time" id="exampleEmail" placeholder="Start Time" type="time" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleEmail" class="">End Time</label>
                            <input name="end_time" id="exampleEmail" placeholder="End Time" type="time" class="form-control">
                        </div>

                        <div class="btn">
                            <button type="submit" class="button-25"> Submit </button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="card-body">
                <div class="card-title">
                    <h1>Things to do!</h1>
                </div>
            </div>

        </div>

    </div>
</body>
</html>
