<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bright Containers</title>
</head>
<body>
    <table cellpadding="0" cellspacing="0">
        <tbody><tr>
            <td>
                Hello {{$details['name']}}
            </td>
        </tr>
        <tr>
            <td class="content-block">
                <h3>{{$details['title']}}</h3>
            </td>
        </tr>
        <tr>
            <td class="content-block">
             {{$details['body']}}
            </td>
        </tr>
      </tbody></table>
</body>
</html>
