<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Notification</title>
</head>

<body>
    <h1>Hello Mr. {{ $mailData['employer']->name }}</h1>
    <table>
        <tr>
            <td>
                <h3>{{ $mailData['job']->title }}</h3>
            </td>
        </tr>
        <tr>
            <td>
                <p>Applicant Name: {{ $mailData['user']->name }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Applicant Email: {{ $mailData['user']->email }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Applicant Phone: {{ $mailData['user']->phone }}</p>
            </td>
        </tr>
    </table>
</body>

</html>
