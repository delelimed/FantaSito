<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Select2</title>

    <!-- Includi jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Includi Select2 CSS e JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>
<body>

<select multiple="multiple" id="testSelect" style="width: 200px;"></select>

<script>
    $(document).ready(function() {
        $('#testSelect').select2({
            data: [
                { id: 1, text: 'Partecipante 1' },
                { id: 2, text: 'Partecipante 2' },
                { id: 3, text: 'Partecipante 3' }
            ]
        });
    });
</script>

</body>
</html>
