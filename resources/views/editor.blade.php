<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tiny.cloud/1/w9it82e6ghk4v102743grm1gzw7hq14hcog43zt8x5idp7yc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
<?php if (Auth::user()->username) $admin = 1; else $admin = 0; ?>
<form action='{{ route('submit', [ 'user' => Auth::user(), 'isAdmin' => $admin ]) }}' method='post'>
    {{ csrf_field() }}
    <h1><label for='input'>Enter your message:</label></h1>
    <textarea name='content' id='input' class='form-control'>
        Message
    </textarea>
    <button type='submit'>Submit</button>
{{--    {!! Auth::user() !!}--}}
</form>

  <script>
      tinymce.init({
          selector: 'textarea',
          plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
          toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
          mergetags_list: [
              { value: 'First.Name', title: 'First Name' },
              { value: 'Email', title: 'Email' },
          ],
      });
  </script>
</body>
</html>
