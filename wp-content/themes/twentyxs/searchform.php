<div id="nav" class="search-form-footer">
<?php $search_text = "Type What You Want"; ?>
<form method="get" id="searchform-footer" action="<?php home_url(); ?>/">
<input type="text" value="<?php echo $search_text; ?>" name="s" id="s" onBlur="if (this.value == '') {this.value = '<?php echo $search_text; ?>';}" onFocus="if (this.value == '<?php echo $search_text; ?>') {this.value = '';}" />
<input type="hidden" id="searchsubmit-footer" />
<input type="submit" value="Search" title="Search" class="searchsubmit-footer" />
</form>
</div>