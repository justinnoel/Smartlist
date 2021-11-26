<div class="chip-suggestions" id="item_chip">
    <div class="chip waves-effect" onclick="itemChip(this)">+ Box</div>
    <div class="chip waves-effect" onclick="itemChip(this)">+ Container</div>
    <div class="chip waves-effect" onclick="itemChip(this)">+ Bottle</div>
    <div class="chip waves-effect" onclick="itemChip(this)">+ Can</div>
    <div class="chip waves-effect" onclick="itemChip(this)">+ Bag</div>
    <div class="chip waves-effect" onclick="itemChip(this)">+ Item</div>
    <div class="chip waves-effect" onclick="itemChip(this)">+ Count</div>
</div>

<style>
    #item_chip .chip {
        border: 1px solid rgba(0, 0, 0, .1);
        background: transparent !important;
    }
</style>
<script>
    function itemChip(el) {
        var x = el.parentElement.parentElement.getElementsByTagName('input')[0]; 
        x.focus();
        if(x.value > 1 || x.value == 0 || x.value < 0) {
        x.value += el.innerText
            .replace('+', '')
            .toLowerCase()
            .plural();
        }
        else {
            x.value += el.innerText
            .replace('+', '')
            .toLowerCase()
        }
    }
</script>