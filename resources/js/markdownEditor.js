import Editor from '@toast-ui/editor'
import 'codemirror/lib/codemirror.css';
import '@toast-ui/editor/dist/toastui-editor.css';

const editor = new Editor({
  el: document.querySelector('#editor'),
  height: '400px',
  initialEditType: 'markdown',
  placeholder: 'Write something cool!',
});

const codeEditor = new Editor({
  el: document.querySelector('#codeEditor'),
  height: '400px',
  initialEditType: 'wysiwyg',
  placeholder: 'Write something cool!',
});

window.currentIndex = -1;

window.selectComponent = (index) => {
  window.currentIndex = index;

  const content = componentInfo[index]['content'];
  editor.setHTML(content);

  const content_php = componentInfo[index]['content_php'];
  codeEditor.insertText(content_php);

  $('.modal__close-btn').trigger('click');
}

window.saveComponentContent = () => {
  if( currentIndex == -1 )
    return;

  const id = componentInfo[ currentIndex ].id;
  const content = editor.getHTML();
  const content_php = codeEditor.getMarkdown();

  $.post('/component/saveContent', {id, content, content_php}, (res) => {
    const data = JSON.parse(res);

    if( data.success ) {
      toastr.success(data.message);
      window.location.reload();
    } else {
      toastr.warning(data.message || 'Something went wrong.');
    }
  }).catch(err => {
    console.log(err);
    toastr.warning( 'Something went wrong.' );
  });
}

window.previewComponent = () => {
  const content = editor.getHTML();

  $('#previewPanel').html(content);
}

window.setComponentName = () => {
  if( currentIndex == -1 )
    return;

  const name = componentInfo[currentIndex]['name'];
  
  $('#editComponentNameInput').val( name );
}

window.updateComponentName = () => {
  if( currentIndex == -1 )
    return;

  const id = componentInfo[currentIndex]['id'];
  const name = componentInfo[currentIndex]['name'];
  const updatedName = $('#editComponentNameInput').val();

  if( updatedName == '' || updatedName == name )
    return;
  
  $.post('/component/updateName', {id, updatedName}, (res) => {
    const data = JSON.parse(res);

    if( data.success ) {
      toastr.success( data.message );
      window.location.reload();
    } else {
      toastr.warning( data.message || 'Something went wrong.' );
    }
  }).catch(err => {
    console.log(err);
    toastr.warning( 'Something went wrong.' );
  });
}

window.deleteComponent = () => {
  if( currentIndex == -1 )
    return;

  if( confirm('Do you really want to delete this component?') ) {
    const id = componentInfo[currentIndex]['id'];
    
    $.post('/component/deleteComponent', { id }, (res) => {
      const data = JSON.parse(res);

      if( data.success ) {
        toastr.success( data.message );
        window.location.reload();
      } else {
        toastr.warning( data.message || 'Something went wrong.' );
      }
    }).catch(err => {
      console.log(err);
      toastr.warning( 'Something went wrong.' );
    });
  }
}

window.copyShortCode = (index) => {
  const category = componentInfo[index]['category'];
  const name = componentInfo[index]['name'];

  const text = `<x-`+ category +`.`+ name +` />`;

  navigator.clipboard.writeText(text);

  toastr.success('Copied');
}

$('#createComponentBtn').click(() => {
  const val = $('#createComponentName').val();
  const category = $('#createComponentCategory').val();

  $.post('/component/add', { name: val, category: category }, (res) => {
    const data = JSON.parse(res);

    if( data.success ) {
      toastr.success(data.message);
      window.location.reload();
    } else {
      toastr.warning(data.message || 'Something went wrong.');
    }
  }).catch(err => {
    console.log(err);
    toastr.warning( 'Something went wrong.' );
  });
});