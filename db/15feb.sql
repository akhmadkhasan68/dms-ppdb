
ALTER TABLE `student` 
ADD COLUMN `alamat_ayah` text NULL AFTER `hp_ayah`,
ADD COLUMN `alamat_ibu` text NULL AFTER `hp_ibu`,
ADD COLUMN `alamat_wali` text NULL AFTER `kewarganegaraan_wali`;