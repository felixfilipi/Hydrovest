function generateClientId(length) {
  var result           = '';
  var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  var charactersLength = characters.length;
  for ( var i = 0; i < length; i++ ) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return result;
}

function changeConnectionStatus(status){
  var connection_status = document.getElementById('connectionStatus');

  if(status == 0){ // no connection
    connection_status.classList.remove('bg-green-600');
    connection_status.classList.add('bg-red-600');
    connection_status.innerText = "No Connection";
    
  }else if(status == -1){

    if(connection_status.classList.contains('bg-green-600')){
      connection_status.classList.remove('bg-green-600');
    }else if(connection_status.classList.contains('bg-red-600')){
      connection_status.classList.remove('bg-red-600');
    }

    connection_status.classList.add('bg-yellow-600');
    connection_status.innerText = "Connecting...";

  }else if(status == 1){
    
    if(connection_status.classList.contains('bg-yellow-600')){
      connection_status.classList.remove('bg-yellow-600');
    }else if(connection_status.classList.contains('bg-red-600')){
      connection_status.classList.remove('bg-red-600');
    }

    connection_status.classList.add('bg-green-600');
    connection_status.innerText = "Connected";

  }
}

function updateModal(sensor_name, status){ // 0 normal, 1 lebih dari, -1 kurang dari

  if(sensor_name == "tds"){

    var modal_content = document.getElementById('tds-modal-content');

    if(status == 0){
      modal_content.innerText = "Kondisi total dissolved soil aquaponik anda normal";
    }else if(status == 1){
      modal_content.innerText = "Kondisi total dissolved soil aquaponik anda lebih, diharapkan ...";
    }else if(status == -1){
      modal_content.innerText = "Kondisi total dissolved soil aquaponik anda kurang, diharapkan ...";
    }

  }else if(sensor_name == "turbidity"){

    var modal_content = document.getElementById('turbidity-modal-content');

    if(status == 0){
      modal_content.innerText = "Kondisi turbidity aquaponik anda normal";
    }else if(status == 1){
      modal_content.innerText = "Kondisi turbidity aquaponik anda lebih, diharapkan ...";
    }else if(status == -1){
      modal_content.innerText = "Kondisi turbidity aquaponik anda kurang, diharapkan ...";
    }

  }else if(sensor_name == "temperature"){

    var modal_content = document.getElementById('temperature-modal-content');

    if(status == 0){
      modal_content.innerText = "Kondisi temperature aquaponik anda normal";
    }else if(status == 1){
      modal_content.innerText = "Kondisi temperature aquaponik anda lebih, diharapkan ...";
    }else if(status == -1){
      modal_content.innerText = "Kondisi temperature aquaponik anda kurang, diharapkan ...";
    }

  }else if(sensor_name == "humidity"){

    var modal_content = document.getElementById('humidity-modal-content');

    if(status == 0){
      modal_content.innerText = "Kondisi humidity aquaponik anda normal";
    }else if(status == 1){
      modal_content.innerText = "Kondisi humidity aquaponik anda lebih, diharapkan ...";
    }else if(status == -1){
      modal_content.innerText = "Kondisi humidity aquaponik anda kurang, diharapkan ...";
    }

  }

}

function updateStatus(graph_name, status){ // 0 for sehat, 1 for butuh perhatian, 2 for bahaya

  if(graph_name == "tds"){
    var status_badge = document.getElementById('tds_status');
  }else if(graph_name == "turbidity"){
    var status_badge = document.getElementById('turbidity_status');
  }else if(graph_name == "temperature"){
    var status_badge = document.getElementById('temperature_status');
  }else if(graph_name == "humidity"){
    var status_badge = document.getElementById('humidity_status');
  }
  
  if(status_badge.classList.contains('bg-yellow-600')){
    status_badge.classList.remove('bg-yellow-600');
  }else if(status_badge.classList.contains('bg-red-600')){
    status_badge.classList.remove('bg-red-600');
  }else if(status_badge.classList.contains('bg-green-600')){
    status_badge.classList.remove('bg-green-600');
  }else if(status_badge.classList.contains('bg-gray-600')){
    status_badge.classList.remove('bg-gray-600');
  }

  if(status == 0){

    status_badge.classList.add('bg-green-600');
    status_badge.innerText = "Status: Healthy";

  }else if(status == 1){
    status_badge.classList.add('bg-yellow-600');
    status_badge.innerText = "Status: Normal";
  
  }else if(status == 2){
    status_badge.classList.add('bg-red-600');
    status_badge.innerText = "Status: Unhealthy";
  }

}

function updateSensor(gauge, graph, value){
  // get datetime now
  var datetime = new Date().toISOString().substr(11, 8);
  console.log(graph);

  // update graph
  var graph_datasets = graph.data.datasets[0].data;
  var graph_labels = graph.data.labels;
  if (graph_datasets.length == 50){
    graph_datasets.shift();
    graph_labels.shift();
  }
  graph_datasets.push(value);
  graph_labels.push(datetime);
  graph.update();

  // update gauge
  gauge.setValueAnimated(value);
}
