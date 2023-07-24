<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('backend/clock/clock.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/nepali-date-converter/dist/nepali-date-converter.umd.js"></script>
<script>
    let date_np = new NepaliDate().format('YYYY/MM/DD');
    let a =" B.S";
    document.getElementById('nepali_date').innerHTML = date_np.concat(a);
</script>
