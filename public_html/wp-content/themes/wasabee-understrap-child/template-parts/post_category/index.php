<p class='<?= $this->get('className') ?>'>
    <?php 
        $postTaxonomies = get_post_taxonomies($this->postId);
        if (empty($postTaxonomies)) {
            return;
        }

        $customTerms = get_the_terms(
            $this->postId, 
            $postTaxonomies[0]
        );
        
        if (empty($customTerms)) {
            return;
        }

        echo $customTerms[0]->name;
    ?>
</p>
