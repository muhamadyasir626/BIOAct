function toggleinput() {
  var roleSelect = document.getElementById('role');
  var areaInput = document.getElementById('areaInput');
  var lkInput = document.getElementById('lkInput');

  var selectedOptionId = roleSelect.options[roleSelect.selectedIndex].id;
  // console.log(selectedOptionId);

  areaInput.style.display = 'none';
  lkInput.style.display = 'none';

  if (selectedOptionId === 'lembaga_konservasi') {
    lkInput.style.display = 'block';
  } else if (selectedOptionId === 'unit_pelaksana_teknis') {
    areaInput.style.display = 'block';
  }
}

document.getElementById('role').addEventListener('change', toggleinput);

function searchPostalCode() {
  var postalCode = document.getElementById('kode_pos').value;

  if (postalCode.length > 2) {
    fetch(`/api/search?postalCode=${postalCode}`)
      .then(response => response.json())
      .then(data => {
        console.log("Data received: ", data);
        if (data.length > 0) {
          document.getElementById('provinsi').value = data[0].province;
          document.getElementById('kabupaten').value = data[0].regency;
          document.getElementById('kecamatan').value = data[0].district;
          document.getElementById('kelurahan').value = data[0].village;
        } else {
          document.getElementById('provinsi').value = '';
          document.getElementById('kabupaten').value = '';
          document.getElementById('kecamatan').value = '';
          document.getElementById('kelurahan').value = '';
        }
      })
      .catch(error => {
        console.error('Error fetching data:', error);
    })
  } else {
    document.getElementById('provinsi').value = '';
    document.getElementById('kabupaten').value = '';
    document.getElementById('kecamatan').value = '';
    document.getElementById('kelurahan').value = '';
  }
}

function debounce(func, wait) {
  let timeout;
  return function executedFunction(...args) {
      const later = () => {
          clearTimeout(timeout);
          func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
  };
}

document.getElementById('kode_pos').addEventListener('input', debounce(searchPostalCode, 300));
