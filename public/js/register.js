document.getElementById('role').addEventListener('change', toggleinput);

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

document.getElementById('kode_pos').addEventListener('input', debounce(searchPostalCode, 1000));

function searchPostalCode() {
  var postalCode = document.getElementById('kode_pos').value;

  if (postalCode.length === 5) {
    fetch(`/api/search?postalCode=${postalCode}`)
      .then(response => response.json())
      .then(data => {
        // console.log("Data received: ", data);  
        if (data.data && data.data.length > 0) {
          var locationData = data.data[0];
          document.getElementById('provinsi').value = locationData.province;
          document.getElementById('kabupaten').value = locationData.regency;
          document.getElementById('kecamatan').value = locationData.district;
          document.getElementById('kelurahan').value = locationData.village;
        } else {
          document.getElementById('provinsi').value = '';
          document.getElementById('kabupaten').value = '';
          document.getElementById('kecamatan').value = '';
          document.getElementById('kelurahan').value = '';
        }
      })
      .catch(error => {
        console.error('Error fetching data:', error);
        document.getElementById('provinsi').value = '';
        document.getElementById('kabupaten').value = '';
        document.getElementById('kecamatan').value = '';
        document.getElementById('kelurahan').value = '';
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

