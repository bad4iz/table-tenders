export default function(idTable) {
  const id = idTable ? '#' + idTable : '';
  const tableNode = document.querySelector('table' + id);
  /**
   *
   * @param {* nodeElement} el
   * @param {* number} fa
   * если положительное то выборка происходит с первого елемента
   * если отрицательное то с конца
   */
  function getTextNode(el, fa = 1) {
    let node = el;
    if (fa > 0) {
      while (node.nodeType !== 3) {
        node = node.firstChild;
      }
    } else if (fa < 0) {
      while (node.nodeType !== 3) {
        node = node.lastChild;
      }
    }

    return node.nodeValue;
  }

  const ths = [].slice.call(tableNode.querySelector('thead').firstChild.childNodes);

  const headers = ths.map(element => {
    let node = getTextNode(element, -1);
    return node;
  });

  const trs = [].slice.call(tableNode.querySelectorAll('tbody>tr'));

  const body = trs.map(tr => {
    const arrTr = [].slice.call(tr.childNodes).filter(item => item.nodeType == 1);
    return arrTr.map(td => {
      return getTextNode(td).trim();
    });
  });

  const table = {
    headers,
    body
  };
  return table;
}
