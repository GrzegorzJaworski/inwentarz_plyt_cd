<form action="{$baseUrl}/index/{$action}" method="post">
    <div>
        <label for="artist">Artist</label>
        <input type="text" name="artist" value="{$album->artist}" />
    </div>
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="{$album->title}" />
    </div>
    <div id="formbutton">
        <input type="hidden" name="id" value="{$album->id}" />
        <input type="submit" name="add" value="{$buttonText}" />
    </div>
</form>
