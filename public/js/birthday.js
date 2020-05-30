// 誕生日 日付の取得
function setDay() {
    // 年の値を取得
    const yearVal = document.getElementById('year').value;
    // 月の値を取得
    const monthVal = document.getElementById('month').value;
    // 日のセレクトボックスに挿入するHTML
    let html = '<option value="">---</option>';
    // 年月が有効な値の場合のみ日付の選択肢を加える
    if (yearVal !== '' && monthVal !== '') {
      // 特定の年月の最後の日付を取得する
      const lastDay = (new Date(yearVal, monthVal, 0)).getDate();
      // optionを組み立てる
      for (let day = 1; day <= lastDay; day++) {
        html += '<option value="' + day + '">' + day + '</option>';
      }
    }
    document.getElementById('day').innerHTML = html;
  };
  
  window.onload = function () {
    setDay();
    document.getElementById('year').addEventListener('change', setDay);
    document.getElementById('month').addEventListener('change', setDay);
  
    // リダイレクトした場合に元の入力値を復元する
    const dayElem = document.getElementById('day');
    dayElem.value = dayElem.getAttribute('data-old-value');
  }