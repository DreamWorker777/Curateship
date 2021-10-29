<div class="tabs-v3 js-tabs">
  <ul class="tabs-v3__controls js-tabs__controls text-component text-sm controlbar--sticky" aria-label="Tabs Interface">
    <li><a href="#tab1Panel1" class="tabs-v3__control js-tab-focus" aria-selected="true">HTML</a></li>
    <li><a href="#tab1Panel2" class="tabs-v3__control js-tab-focus">PHP</a></li>
    <button class="btn btn--primary justify-between margin-sm markdownEditor__save" onclick="saveComponentContent()">Save</button>
  </ul>

  <div class="tabs-v3__panels js-tabs__panels">
    <section id="tab1Panel1" class="tabs-v3__panel is-visible js-tabs__panel">
      <div class="text-component">
        <h1>HTML Codes</h1>

        <!-- Markdown Editor -->
        <div class="flex flex-col space-y-2">
          <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm markdownEditor__editor"><div>
        </div>

      </div>
    </section>

    <section id="tab1Panel2" class="tabs-v3__panel js-tabs__panel">
      <div class="text-component">
        <h1>PHP Codes</h1>
        
        <!-- Markdown Editor -->
        <div class="flex flex-col space-y-2">
          <div id="codeEditor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm markdownEditor__editor"><div>
        </div>
      </div>
    </section>

  </div>
</div>