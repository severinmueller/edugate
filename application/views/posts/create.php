<h2><?php $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Add title...">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea name="body" id="editor"></textarea>
        <script>

            ClassicEditor
                .create( document.querySelector( '#editor' ),{
                    removePlugins: [ 'Image', 'Media' ]
                } )
                .catch( error => {
                    console.error( error );
                })
                .editorConfig = function( config ) {
                config.toolbarGroups = [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ];

                config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Scayt,SelectAll,Find,Replace,Undo,Redo,Cut,Copy,Paste,PasteText,PasteFromWord,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Image,Flash,Table,HorizontalRule,Iframe,PageBreak,Styles,Format,Font,FontSize,TextColor,BGColor,Maximize,ShowBlocks,About';
            };

        </script>
    </div>
<div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
        <?php foreach($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label>Upload image</label>
    <input type="file" name="userfile" size="20">
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>