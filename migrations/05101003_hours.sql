ALTER TABLE `wishlist`
    ADD `hours` INT NOT NULL AFTER `datum` DEFAULT '0',
    ADD `hours_approved` BOOLEAN NULL DEFAULT NULL
    AFTER `hours`;
