<form action="/upload" enctype="multipart/form-data" method="post">
    @csrf
    <input type="file" name="post[images_url]">
    <input type="submit" value="アップロードする">
</form>