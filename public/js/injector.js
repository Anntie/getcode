function inject () {
  const url = 'https://nowdialogue.com/api/merchant/48/widget/presets/86';
  const xhr = new XMLHttpRequest();

  xhr.open('GET', url);
  xhr.send();

  xhr.onload = () => {
    if (xhr.status === 200) {
      const block = document.getElementById('b');
      block.innerHTML = JSON.parse(xhr.response);

      block.childNodes.forEach(node => {
        if (node.tagName === 'SCRIPT') {
          eval(node.outerText);
        }
      });
    }
  };
}

(() => document.getElementById('a').onclick = inject)();
