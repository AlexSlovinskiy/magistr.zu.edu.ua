<script type="text/javascript">
// ������� ����� ������ ��������� �������
var syncList1 = new syncList;

// ���������� �������� ����������� ������� (2 � 3 ��������)
syncList1.dataList = {

/* ���������� �������� ������� ������ � �����������
�� ���������� �������� � ������ ������ */

  '����������':{
  		'0101-istor':'0101. ���������� �����'
 },

  '�����������':{
      	'0101-pryrod':'0101. ���������� �����'
  },

  '�Ͳ �������� ������㳿':{
      	'0101-inyaz':'0101. ���������� �����',
      	'0305-inyaz':'0305. Գ������'
  },

  '�Ͳ ���������':{
  		'0101-pedfak':'0101. ���������� �����',
      	'0202-pedfak':'0202. ���������'
  },

  '�Ͳ Գ����㳿 �� �����������':{
      	'0101-filfak':'0101. ���������� �����',
      	'0302-filfak':'0302. �����������'
 },

  '��������� ������������':{
  		'0101-socpsyh':'0101. ���������� �����',
      	'0401-socpsyh':'0401. ���������',
      	'0502-socpsyh':'0502. ����������'
 },

  'Գ����-������������':{
      	'0101-fizmat':'0101. ���������� �����',
      	'0802-fizmat':'0802. ��������� ����������'
  },

  'Գ������� ��������� �� ������':{
      	'0101-fizkult':'0101. ���������� �����'
  },

/*���������� �������� �������� ������ � �����������
�� ���������� �������� �� ������ ������ */

  '0101-istor':{
  		'7.010103 ����. ������':'7.010103 ����. ������'
  },

  '0101-pryrod':{
      	'7.010103 ����. �������':'7.010103 ����. �������',
      	'7.010103 ����. ճ��':'7.010103 ����. ճ��'
  },

  '0101-inyaz':{
      	'7.010103 ����. ���� �� ��������� (���������)':'7.010103 ����. ���� �� ��������� (���������)',
      	'7.010103 ����. ���� �� ��������� (��������)':'7.010103 ����. ���� �� ��������� (��������)'
  },

  '0305-inyaz':{
  		'7.030507 ��������':'7.030507 ��������'
  },

  '0202-pedfak':{
  		'7.020207 ������� ��������� � ���������':'7.020207 ������� ��������� � ���������'
  },

  '0101-pedfak':{
  		'7.010101 �������� ���������':'7.010101 �������� ���������',
  		'7.010102 ��������� ��������':'7.010102 ��������� ��������'
  },

  '0101-filfak':{
  		'7.010103 ����. ���� �� ��������� (��������)':'7.010103 ����. ���� �� ��������� (��������)',
  		'7.010103 ����. ��������� ���� �� ���������':'7.010103 ����. ��������� ���� �� ���������'
  },

  '0302-filfak':{
  		'7.030203 ��������� ������ �� �����������':'7.030203 ��������� ������ �� �����������'
  },

  '0502-socpsyh':{
  		'7.050201 ���������� �����������':'7.050201 ���������� �����������'
  },

  '0401-socpsyh':{
  		'7.040101 ���������':'7.040101 ���������'
  },

  '0101-socpsyh':{
  		'7.010107 ��������� ���������':'7.010107 ��������� ���������',
  		'7.010105 ��������� ���������':'7.010105 ��������� ���������'
  },

  '0101-fizmat':{
  		'7.010103 ����. ����������':'7.010103 ����. ����������',
  		'7.010103 ����. Գ����':'7.010103 ����. Գ����'
  },

  '0802-fizmat':{
  		'7.080201 �����������':'7.080201 �����������'
  },

  '0101-fizkult':{
		'7.010103 ����. Գ����� ��������':'7.010103 ����. Գ����� ��������'
  },

  /*���������� �������� ���������� ������ � �����������
�� ���������� �������� � ������� ������ */

  '7.010103 ����. ������':{
  		'7.010103 ����. ������. ������������: �������������':'7.010103 ����. ������. ������������: �������������',
  		'7.010103 ����. ������. ������������: �������� ������� ������ ':'7.010103 ����. ������. ������������: �������� ������� ������ ',
  		'7.010103 ����. ������ �� ��������� ���� � ���������':'7.010103 ����. ������ �� ��������� ���� � ���������'
},

  '7.010103 ����. �������':{
      	'7.010103 ����. �������':'7.010103 ����. �������',
		'7.010103 ����. ������� � ����':'7.010103 ����. ������� � ����',
		'7.010103 ����. �������. 7.040101 ���������. ������������: ��������� ���������':'7.010103 ����. �������. 7.040101 ���������. ������������: ��������� ���������',
		'7.010103 ����. �������. ������������: ��������� � ���������-���������� ������':'7.010103 ����. �������. ������������: ��������� � ���������-���������� ������'
  },

  '7.010103 ����. ճ��':{
      	'7.010103 ����. ճ�� � ������':'7.010103 ����. ճ�� � ������'

  },

  '7.010103 ����. ���� �� ��������� (���������)':{
      	'7.010103 ����. ���� �� ��������� (���������, ��������)':'7.010103 ����. ���� �� ��������� (���������, ��������)',
      	'7.010103 ����. ���� �� ��������� (���������). 7.010105 ��������� ���������. ������������: ���������-���������� ������ � �쒺�.':'7.010103 ����. ���� �� ��������� (���������). 7.010105 ��������� ���������. ������������: ���������-���������� ������ � �쒺�',
		'7.010103 ����. ���� �� ��������� (���������). ������������: �������� ����':'7.010103 ����. ���� �� ��������� (���������). ������������: �������� ����'
   },

  '7.010103 ����. ���� �� ��������� (��������)':{
      	'7.010103 ����. ���� �� ��������� (��������, ���������)':'7.010103 ����. ���� �� ��������� (��������, ���������)',
		'7.010103 ����. ���� �� ��������� (��������). 7.010105 ��������� ���������. ������������: ���������-���������� ������ � �쒺�.':'7.010103 ����. ���� �� ��������� (��������). 7.010105 ��������� ���������. ������������: ���������-���������� ������ � �쒺�',
  },

  '7.030507 ��������':{
      	'7.030507 ��������':'7.030507 ��������'
		},

  '7.020207 ������� ��������� � ���������':{
      	'7.020207 ������� ��������� � ���������. ������������: ������� ��������':'7.020207 ������� ��������� � ���������. ������������: ������� ��������',
		'7.020207 ������� ��������� � ��������� (���� ����������� ������)':'7.020207 ������� ��������� � ��������� (���� ����������� ������)'
		},

	'7.010101 �������� ���������':{
      	'7.010101 �������� ��������� (���� ����������� ������)':'7.010101 �������� ��������� (���� ����������� ������)'
		},

	'7.010102 ��������� ��������':{
      	'7.010102 ��������� ��������. ������������: ���� �� ��������� (���������)':'7.010102 ��������� ��������. ������������: ���� �� ��������� (���������)',
		'7.010102 ��������� ��������. ������������: ������������ ���������':'7.010102 ��������� ��������. ������������: ������������ ���������',
		'7.010102 ��������� ��������. ������������: ������':'7.010102 ��������� ��������. ������������: ������',
		'7.010102 ��������� ��������. 7.010103 ��������� � �������� �������� �����. �����������':'7.010102 ��������� ��������. 7.010103 ��������� � �������� �������� �����. �����������',
		'7.010102 ��������� ��������. 7.040101 ���������. ������������: ��������� ���������':'7.010102 ��������� ��������. 7.040101 ���������. ������������: ��������� ���������',
		'7.010102 ��������� �������� (���� ����������� ������)':'7.010102 ��������� �������� (���� ����������� ������)'
		},

	'7.010103 ����. ���� �� ��������� (��������)':{
      	'7.010103 ����. ���� �� ��������� (��������, ���������)':'7.010103 ����. ���� �� ��������� (��������, ���������)',
		'7.010103 ����. ���� �� ��������� (��������, ��������)':'7.010103 ����. ���� �� ��������� (��������, ��������)'
		},

	'7.010103 ����. ��������� ���� �� ���������':{
		'7.010103 ����. ��������� ���� �� ���������':'7. 010103 ����. ��������� ���� �� ���������',
		'7.010103 ����. ��������� ���� �� ��������� (���� ����������� ������)':'7. 010103 ����. ��������� ���� �� ��������� (���� ����������� ������)',
		'7.010103 ����. ��������� ���� � ���������. 7.010105 ��������� ���������. C�����������: ���������-���������� ������ � ��`��':'7.010103 ����. ��������� ���� � ���������. 7.010105 ��������� ���������. C�����������: ���������-���������� ������ � ��`��',
		'7.010103 ����. ��������� ���� � ���������. 7.040101 ���������. ������������: ��������� ���������':'7.010103 ����. ��������� ���� � ���������. 7.040101 ���������. ������������: ��������� ���������',
		'7.010103 ����. ��������� ���� � ��������� �� ���� � ��������� (���������)':'7.010103 ����. ��������� ���� � ��������� �� ���� � ��������� (���������)',
		'7.010103 ����. ��������� ���� � ��������� �� ���� � ��������� (��������)':'7.010103 ����. ��������� ���� � ��������� �� ���� � ��������� (��������)',
		'7.010103 ����. ��������� ���� �� ���������. ������������: ����������� ������� ������':'7.010103 ����. ��������� ���� �� ���������. ������������: ����������� ������� ������',
		'7.010103 ����. ��������� ���� �� ���������. ������������: �������� ����':'7.010103 ����. ��������� ���� �� ���������. ������������: �������� ����',
		'7.010103 ����. ��������� ���� �� ���������. ������������: ������ ����������������':'7.010103 ����. ��������� ���� �� ���������. ������������: ������ ����������������'
		},

	'7.030203 ��������� ������ �� �����������':{
      	'7.030203 ��������� ������ �� �����������':'7.030203 ��������� ������ �� �����������'
		},

	'7.050201 ���������� �����������':{
      	'7.050201 ���������� �����������':'7.050201 ���������� �����������'
		},

	'7.040101 ���������':{
		},

 	'7.010105 ��������� ���������':{
      	'7.010105 ��������� ���������. 7.010103 ��������� � �������� �������� �����. ������':'7.010105 ��������� ���������. 7.010103 ��������� � �������� �������� �����. ������',
		'7.010105 ��������� ��������� (���� ����������� ������)':'7.010105 ��������� ��������� (���� ����������� ������)'
		},

	'7.010107 ��������� ���������':{
		'7.010107 ��������� ���������. C�����������: ��������� ���������':'7.010107 ��������� ���������. C�����������: ��������� ���������'
		},

	'7.010103 ����. ����������':{
      	'7.010103 ����. ���������� � ������':'7.010103 ����. ���������� � ������',
		'7.010103 ����. ���������� �� ������ �����������':'7.010103 ����. ���������� �� ������ �����������',
		'7.010103 ����. ���������� �� ������ ��������':'7.010103 ����. ���������� �� ������ ��������'
		},

	'7.010103 ����. Գ����':{
      	'7.010103 ����. Գ���� � ����������':'7.010103 ����. Գ���� � ����������',
		'7.010103 ����. Գ���� �� ������ �����������':'7.010103 ����. Գ���� �� ������ �����������'
		},

	'7.080201 �����������':{
      	'7.080201 �����������':'7.080201 �����������'
		},

	'7.010103 ����. Գ����� ��������':{
      	'7.010103 ����. Գ����� �������� � ������. ������������: ���������� ������':'7.010103 ����. Գ����� �������� � ������. ������������: ���������� ������',
		'7.010103 ����. Գ����� ��������. ������������: ��������� �� ���������-���������� ������':'7.010103 ����. Գ����� ��������. ������������: ��������� �� ���������-���������� ������',
		'7.010103 ����. Գ����� ��������. ������������: ��������-��������� ������ ������, ���������� ������':'7.010103 ����. Գ����� ��������. ������������: ��������-��������� ������ ������, ���������� ������',
		'7.010103 ����. Գ����� ��������. (���� ����������� ������)':'7.010103 ����. Գ����� ��������. (���� ����������� ������)'
		},

};

// �������� ������������� ��������� �������
syncList1.sync("faculty","training","speciality","specialization");
</script>