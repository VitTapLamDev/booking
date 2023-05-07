<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script>
    function alert(type, msg){
        let bs_class = (type == 'success' ? 'alert-success': 'alert-danger');
        let element = document.createElement('div');
        element.style.position = 'fixed';
        element.style.top = '80px';
        element.style.right = '0';
        element.style.zIndex = '9999';
        element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;
        document.body.append(element);
    }
</script>