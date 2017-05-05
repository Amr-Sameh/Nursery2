<?php
/**
* Insert new file.
*
* @param Google_Service_Drive $service Drive API service instance.
* @param string $title Title of the file to insert, including the extension.
* @param string $description Description of the file to insert.
* @param string $parentId Parent folder's ID.
* @param string $mimeType MIME type of the file to insert.
* @param string $filename Filename of the file to insert.
* @return Google_Service_Drive_DriveFile The file that was inserted. NULL is
*     returned if an API error occurred.
*/
function insertFile($service, $title, $description, $parentId, $mimeType, $filename) {
$file = new Google_Service_Drive_DriveFile();
$file->setTitle($title);
$file->setDescription($description);
$file->setMimeType($mimeType);

// Set the parent folder.
if ($parentId != null) {
$parent = new Google_Service_Drive_ParentReference();
$parent->setId($parentId);
$file->setParents(array($parent));
}

try {
$data = file_get_contents($filename);

$createdFile = $service->files->insert($file, array(
'data' => $data,
'mimeType' => $mimeType,
));

// Uncomment the following line to print the File ID
// print 'File ID: %s' % $createdFile->getId();

return $createdFile;
} catch (Exception $e) {
print "An error occurred: " . $e->getMessage();
}
}