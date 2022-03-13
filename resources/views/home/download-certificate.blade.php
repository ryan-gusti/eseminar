<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>
  <title>Download Sertifikat</title>
</head>
<body>
<div class="invoice" id="invoice">
<img style="height: 1280px;width:1920px;" src="data:image/png;base64, {!! base64_encode($certificate) !!} "/>
<img style="position:absolute; top:100px; left:150px;" src="data:image/png;base64, {!! base64_encode($barcode) !!} "/>
</div>
</body>


<script>
  window.onload = function() { 
    const element = document.getElementById("invoice");
    // Choose the element and save the PDF for our user.
    html2pdf()
    .set({ html2canvas: { width: 1920,height: 1280 },jsPDF: { unit: 'in', format: 'A4', orientation: 'landscape' }})
    .from(element)
    .save('sertifikat.pdf');
    }
</script> 
</html>