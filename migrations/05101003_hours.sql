ALTER TABLE `wishlist`
    ADD `hours` INT DEFAULT '0' AFTER `datum`,
    ADD `hours_approved` BOOLEAN NULL DEFAULT NULL
    AFTER `hours`;
