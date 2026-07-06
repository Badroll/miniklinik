-- total biaya kunjungan per pasien, hanya menampilkan pasien dengan total biaya lebih dari 1.000.000.
SELECT 
    pa.nama, 
    pa.no_rm, 
    SUM(ku.biaya) AS total_biaya
FROM pasien pa
JOIN kunjungan ku 
    ON pa.id = ku.pasien_id
GROUP BY 
    pa.id, 
    pa.nama, 
    pa.no_rm
HAVING 
    SUM(ku.biaya) > 1000000
;

-- 5 diagnosis terbanyak pada bulan ini, beserta jumlahnya.
SELECT 
    diagnosis, 
    COUNT(*) AS jumlah_kasus
FROM 
    kunjungan
WHERE 
    EXTRACT(YEAR FROM tanggal) = EXTRACT(YEAR FROM CURRENT_DATE)
    AND EXTRACT(MONTH FROM tanggal) = EXTRACT(MONTH FROM CURRENT_DATE)
GROUP BY 
    diagnosis
ORDER BY 
    jumlah_kasus DESC
LIMIT 5
;