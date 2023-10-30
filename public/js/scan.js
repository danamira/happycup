scanButton=document.getElementById('scan')
scanButton.addEventListener("click", async () => {
    try {
            
        const ndef = new NDEFReader();
        await ndef.scan();
        $('#intro_message').hide()
        $('#guide').fadeIn();
        ndef.addEventListener("readingerror", () => {
            alert("Argh! Cannot read data from the NFC tag. Try another one?");
        });

        ndef.addEventListener("reading", ({ message, serialNumber }) => {
        alert('scanned');
        axios({
            method: 'get',
            url: '/cup/store?identifier='+serialNumber,
            responseType: 'stream'
        }).then(function (response) {
                alert('Successfully added.');
            });
        });




} catch (error) {
    
    alert("Argh! " + error);

}
});