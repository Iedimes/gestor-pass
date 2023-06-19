@extends('brackets/admin-ui::admin.layout.default')

@section('body')

    <div class="welcome-quote">
	<script type="text/javascript">
    function Redirect()
    {
        window.location="http://127.0.0.1:8000/admin/credenciales/inicio";
    }

    setTimeout('Redirect()', 0000);
</script>

	    </blockquote>

    </div>

@endsection
